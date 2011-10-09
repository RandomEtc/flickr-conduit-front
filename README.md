flickr-conduit: a PubSub subscriber endpoint for Flickr's real-time PuSH feed
===================

## Description

flickr-conduit is a subsriber endpoint for Flickr's implementation of the PubSubHubbub spec. It handles the the 'subscribe', 'unsubscribe', and the parsing of the XML that Flickr pushes out.

The server works in publish/subscribe model itself, with users registering events they're interested in and then flickr-conduit answering these subscription requests. This works identically to node's own EventEmitter class and in fact uses that under the covers.

This repository is the PHP front-end from https://github.com/mncaudill/flickr-conduit modified to work with Heroku.

## Installation

```bash
git clone https://github.com/RandomEtc/flickr-conduit-front.git
cd flickr-conduit-front
heroku create --stack cedar
```

The `create` command will tell you the URL of your new app, use this for the front-end in the following config. You should also use this URL as the callback URL when you register for a Flickr API key at http://www.flickr.com/services/apps/create/apply/ (you have to edit your app after you create it).

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

