# Asia demo

This is currency exchange project.

## How to use

1. Install package
```
composer install
```
2. Build image
```
make build
```
3. Run container
```
make run
```
4. Check whether the service run successfully.
```
http://0.0.0.0:8000/api/currency/exchange
```
## API Doc

1. See `resources/api-docs/api.yaml`


## Test

```
make test
```