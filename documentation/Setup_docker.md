# Docker Setup

<p>
<blockquote>
Usage of docker is a prototype.  User discretion is advised.
</blockquote>
<p>

## Information

This docker image is based on the latest [debian](https://hub.docker.com/_/debian) docker official image.

Once the image is built the size of the image is about 265MB,  with a change to the base image this size could come down in the future.

The Dockerfile has been composed based on the instructions within the [Setup Local](Setup_local.md) file (_with a few liberations_).

Because this system creates a image based on a baseline state, we can take a few "shortcuts" to automate the process a bit.

Both nginx config files (with changes pre-applied) are included within this repo and are copied in during the `docker build` process.

Where a standard replace could be simply done, that process was used to keep true to the setup instructions.

Since this image is being built from within the code repo, a git clone was not used and the core application was copied in.

## Pre Requirements
Following the [Get Started with Docker](https://www.docker.com/get-started) would be a good start if you need to familiarize yourself with docker
### Linux
- Installation instructions coming soon.
### Windows
- Installation of Docker Desktop for Windows can be found [here](https://download.docker.com/win/stable/Docker%20Desktop%20Installer.exe).
### macOS
- Installation of Docker Desktop for macOS can be found [here](https://download.docker.com/mac/stable/Docker.dmg).

## Build

## Run