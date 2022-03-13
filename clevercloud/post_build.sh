#!/bin/bash
# Frontend build
yarn install --non-interactive --pure-lockfile --force --production=false && yarn run production
