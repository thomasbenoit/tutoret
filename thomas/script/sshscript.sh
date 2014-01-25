#!/bin/bash/

	ssh $1  who| grep -e tty| cut -d' ' -f1

