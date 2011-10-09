## Description

This repository is the PHP front-end from https://github.com/mncaudill/flickr-conduit modified to work with Heroku.

## Prerequisites

You should sign up for a Heroku account and install the Heroku command line client.

## Back-end Installation

First follow the instructions and create an app for https://github.com/RandomEtc/flickr-conduit-back

## Front-end Installation

Once you have the back-end running, clone this app and initialize another new Heroku app on the cedar stack:

```bash
git clone https://github.com/RandomEtc/flickr-conduit-front.git
cd flickr-conduit-front
heroku create --stack cedar
```

Create a new Flickr API key and secret at http://www.flickr.com/services/apps/create/apply/ then edit your new Flickr app and add a callback URL using the app URL reported by `heroku create` plus auth.php - e.g. http://example.com/auth.php

Grab the URL from your backend heroku app, and the URL you just created for this app, and them to the following config along with your new API key and secret:

```bash
heroku config:add BASE_SITE_URL=http://frontend.example.com
heroku config:add URL_WHERE_CONDUIT_LISTENS=http://backend.example.com
heroku config:add BASE_SOCKET_URL=http://backend.example.com
heroku config:add FLICKR_KEY=your_key
heroku config:add FLICKR_SECRET=your_secret
```

Then push to Heroku and open your site:

```bash
git push heroku master
heroku open
```

## Caveats

At the time of writing, Flickr's Push API only works for Pro accounts. Check the response at http://www.flickr.com/services/api/explore/flickr.push.getSubscriptions if in doubt.

