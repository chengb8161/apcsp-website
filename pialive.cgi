#!/bin/bash

echo -e "Content-type: text/html\n\n"

echo "<h1>Raspberry Pi Statuses</h1>"

echo "<h2>Which Raspberry Pis are active?</h2>"

echo "<pre>$(./rpistatus)</pre>"
