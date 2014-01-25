#!/bin/bash


	ping $1 -c 1 -q > /dev/null 2>&1 && echo 1 || echo 0