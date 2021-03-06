# Colja Examples

This project contains Examples how to use the Symfony bundle 
[Colja](https://github.com/d3mo17/colja/).

Try following queries with this project on request-uri `/graphql`:
```graphql
{
    demo
}
```

```graphql
query {
  getEntity(id: 60) {
    id
    name
    children (exclude: [
        "Name of 4th child",
        "Name of second child"
        ]
    ) {
      id
      name
    }
  }
}
```

```graphql
query arg($name: String!, $num: Int) {
  demoArgs(name: $name, num: $num)
}

## Variables:
# {
#	"name": "Colja",
#	"num": 123
# }
```

\
&nbsp;

## License

The MIT License (MIT)

Copyright (c) 2021 Daniel Moritz

Permission is hereby granted, free of charge, to any person obtaining a copy of
this software and associated documentation files (the "Software"), to deal in
the Software without restriction, including without limitation the rights to
use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
the Software, and to permit persons to whom the Software is furnished to do so,
subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
