#!/usr/bin/env bash

result=0
counter=0
until [ $result -eq 42 ] ; do
	let counter+=1
	result=$RANDOM
done
echo "Here's the number $result. It should be 22. It took us $counter attempts to get it."
