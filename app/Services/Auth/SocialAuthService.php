<?php

namespace App\Services\Auth;

use App\Models\User;
use App\Services\User\MockDataService;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\NewAccessToken;
use Laravel\Socialite\AbstractUser as SocialiteUser;

class SocialAuthService
{
    public function __construct(
        protected MockDataService $mockDataService
    ) {
    }

    public function handleUserLogin(SocialiteUser $socialiteUser, string $provider): NewAccessToken
    {
        try {
            DB::beginTransaction();

            $user = $this->createNewUserOrFindExisting($socialiteUser, $provider);
            $this->seedUserWithMockData($user);

            DB::commit();

            return $user->createToken(User::DEFAULT_TOKEN_NAME);
        } catch (\Throwable $exception) {
            DB::rollBack();

            throw new \Exception('Something went wrong while trying to log in the user');
        }
    }

    protected function createNewUserOrFindExisting(SocialiteUser $socialiteUser, string $provider): User
    {
        $user = User::firstOrCreate([
            'email' => $socialiteUser->getEmail()
        ], [
            'email_verified_at' => now(),
            'name' => $socialiteUser->getName(),
        ]);

        $user->socialProviders()->updateOrCreate([
            'provider' => $provider,
            'provider_id' => $socialiteUser->getId(),
        ]);

        return $user;
    }

    protected function seedUserWithMockData(User $user)
    {
        if ($user->wasRecentlyCreated) {
            $this->mockDataService->seed($user);
        }
    }
}
