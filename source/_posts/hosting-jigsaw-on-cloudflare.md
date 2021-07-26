---
extends: _layouts.post
section: content
title: Hosting a Jigsaw site on Cloudflare for free
date: 2021-07-22
description: Host your Jigsaw site with Cloudflare Workers, without paying a cent.
categories: [dev]
cover_image: /assets/img/jigsaw_cf.png
excerpt: Host your Jigsaw site with Cloudflare Workers, without paying a cent.
---

Jigsaw by Tighten is an open source package that allows you to easily generate a static website, for your blog or your project's documentation.

In this post we'll walk through the steps needed to host a Jigsaw generated website on Cloudflare, using Cloudflare Workers.

We'll also set up GitHub Actions to automatically deploy new versions of the site when new content is pushed.

## Why

When I started thinking about getting a blog up and running, I looked around for what existing frameworks and technologies existed in the blogosphere. But, I also wanted to get off the ground quickly, so settled for ripping a news content section from one of my old Laravel projects.

I then told a colleague of mine, [George Boot](https://georgeboot.nl), about my intentions to start a blog, and he suggested I use Jigsaw instead.

## Jigsaw

[Jigsaw](https://jigsaw.tighten.co/), in their own words,
> is a framework for rapidly building static sites using the same modern tooling that powers your web applications.

You write all your content (blog posts, in my case) in markdown or Laravel Blade files, and then run the Jigsaw build process. This generates a static version which you can host in a number of different ways.

This post will not go into the detail of setting up a Jigsaw project, but assume you already have ready to deploy.

## Hosting

Jigsaw lists [a number of easy ways](https://jigsaw.tighten.co/docs/deploying-your-site/) to host your generated site.

GitHub Pages looked really easy, but seeing as my DNS was already in Cloudflare, I opted to go for [Cloudflare Workers Sites](https://developers.cloudflare.com/workers/platform/sites).

## Cloudflare Workers Sites

> Workers Sites enables developers to deploy static applications directly to Workers. It’s perfect for deploying applications built with static site generators

Workers run on Cloudflare's Edge Network - a growing global network of thousands of machines distributed across hundreds of locations.

The Free tier of Workers allow 100,000 requests/day and a maximum of a 1000 requests/min. Once your site traffic exceeds that, you'll have to upgrade to a paid plan, starting at $5/month.

To setup Workers Sites for your Jigsaw project, [follow these steps](https://developers.cloudflare.com/workers/platform/sites/start-from-existing).

Keep the API token you create for Wrangler, as you'll need it a bit later.

Then just two more things are needed to complete the setup:
1. Update the path for the 404 handler in `workers-site/index.js`, on line 62 at time of writing, from `404.html` to `404/index.html`
```js
mapRequestToAsset: req => new Request(`${new URL(req.url).origin}/404/index.html`, req),
```
2. If your project will live on a subdomain, you need to  [add a DNS AAAA record](https://developers.cloudflare.com/workers/platform/routes#subdomains-must-have-a-dns-record) for that subdomain to `100::`

## GitHub Actions

To really round of this solution, we'll configure GitHub Actions to generate and deploy a new version of the site whenever new content is pushed to the `master` branch of the project.

This of course assumes you use GitHub to host your project's code.

Create `.github/workflows/deploy.yaml` in your Jigsaw project, and paste the following content in there:

```yaml
name: Deploy

on:
  push:
    branches:
      - master

jobs:
  deploy:
    runs-on: ubuntu-latest
    name: Deploy
    steps:
      - uses: actions/checkout@v2
      - uses: shivammathur/setup-php@v2
        with:
          php-version: '8.0'

      - uses: ramsey/composer-install@v1
        with:
          composer-options: "--prefer-dist --optimize-autoloader --ignore-platform-reqs"
      - uses: bahmutov/npm-install@v1

      - name: Laravel Mix
        run: npm run prod

      - name: Publish
        uses: cloudflare/wrangler-action@1.3.0
        with:
          apiToken: ${{ secrets.CF_API_TOKEN }}
```

In your project's settings on GitHub, create a new secret (https://github.com/your-/blogh/settings/secrets/actions) called `CF_API_TOKEN`, pasting the CloudFlare API token we created earlier.

And that's it!

Now when a commit is made to the `master` branch of your project, the GitHub Action will run the Jigsaw build process (using `npm run prod`), and then use `cloudflare/wrangler-action` to publish your static site to Cloudflare Workers.

<!-- 

## Typography Styles

Here’s a quick preview of what some of the basic type styles will look like in this starter template:

# h1 Heading
## h2 Heading
### h3 Heading
#### h4 Heading
##### h5 Heading
###### h6 Heading

The quick brown fox jumps over the lazy dog

- The quick brown fox
    - jumps over
        - the lazy dog

1. The quick brown fox
    1. jumps over
        1. the lazy dog

<s>The quick brown fox jumps over the lazy dog</s>

<u>The quick brown fox jumps over the lazy dog</u>

_The quick brown fox jumps over the lazy dog_

**The quick brown fox jumps over the lazy dog**

`The quick brown fox jumps over the lazy dog`

<small>The quick brown fox jumps over the lazy dog</small>

> The quick brown fox jumps over the lazy dog

[The quick brown fox jumps over the lazy dog](#)

```php
class Foo extends bar
{
    public function fooBar()
    {
        //
    }
}
```
-->
