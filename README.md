# streamlabs-assignment
“Stream Events” application as a part of Streamlabs FullStack Assignment

## Requirements

Since the project is running on docker, make sure you have the following installed:

- [docker](https://docs.docker.com)
- [docker-compose](http://docs.docker.com/compose)

## Installation Guide

##### 1. Clone the project:

Begin by cloning the project repository using the following commands:

```bash
git clone git@github.com:valeriitkachenko/streamlabs-assignment.git
cd streamlabs-assignment/
```

##### 2.1. Set Up Environment Files and Launch Docker Containers:

Navigate to the `streamlabs-assignment` directory and create necessary environment files:

```bash
cp .env.example .env

cd docker/
cp .env.example .env
docker-compose up -d
```

##### 2.2. Initialize the Laravel Application

Execute the following commands to initialize the Laravel application:

```bash
docker-compose exec -u laradock workspace bash

composer install
php artisan key:generate
php artisan migrate
```
##### Step 2.3: Configure Twitch API Credentials

Populate the .env file with your Twitch application's secret keys and redirect URL:

```bash
TWITCH_CLIENT_ID=your_client_id
TWITCH_CLIENT_SECRET=your_client_secret
TWITCH_REDIRECT_URI=your_redirect_uri
```

## Additional Notes & Comments
It was an interesting task, but 4 hours is for sure not enough to complete both backend and frontend parts, so I decided to keep my focus on the backend part. If you want, I can also work on the frontend with more time.

You're welcome to watch a video demo of the backend part by following the link:
https://drive.google.com/file/d/1YOCestnm07MpzNiPcCOqjHWN1er8FBlU/view?usp=sharing
