# Docker configuration

In this directory resides a Dockerfile that is used to build a Perl based container, configured specific to our zu environment, to test Perl.

To build this continainer, run

`% build.sh`

The build.sh script will:
1) prompt you for a Docker Hub repository name (default is zushane);
2) prompt you for an image name (default is perl);
3) guess at an appropriate tag, prompting you to confirm it, or enter a new tag;
4) build the image with the given tag, and the `latest` tag;
5) prompt you to log in to Docker Hub;
6) push the tags up to Docker Hub; and
7) log you out of Docker Hub.

*TODO*:
- Move this to a more generic docker hub account, rather than Shane Doucette's docker hub account.
- Figure out how to guess at the repo and image names, rather than hard code defaults in the script.