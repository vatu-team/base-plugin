#!/usr/bin/env bash
git config --global --add safe.directory "${containerWorkspaceFolder}"
git config --global core.filemode false
git config --global blame.ignoreRevsFile "${containerWorkspaceFolder}/.git-blame-ignore-revs"
