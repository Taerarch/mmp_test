# mmp_test



I decided to go beyond just Sydney as the questions asked as the Region filter would all be identical as Greater Sydney.

I thought the best way to manage the filters was for the top level region to filter the areas as well as the accommodations themselves.

Getting a handle on Vue took up most of my time with this project particularly the best way to actually implement it. I ended up with the CLI but I struggled to pin down exactly what Vue Components and Applications are and the best way to arrange them, however it seemed I needed to use the CLI in order to import Axios. The other option was just to import Vue with a script which seemed simpler and more-lightweight however I couldn't import Axios as 'require' didn't want to work leading me to use 'Import'.

Currently my method is causing too much strain since I upped the maximum responses from the api. I'm thinking it might be better if I make targeted get requests with the filters however it'll take a bit of re-writing separating the filters and importing them initially and then only making specific get requests for the lists of accommodations.

I'm also gonna implement pagination on the results to see if that makes life easier.


### Compiles and hot-reloads for development
```
yarn serve
```

### Start the PHP server by navigating to src/php and then
```
php -S localhost:7000
```
