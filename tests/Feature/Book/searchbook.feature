Feature: Search Book
    Scenario: Test existing books with limit is 2
        Given the "Accept" request header is "application/json"
        Given the "Content-Type" request header is "application/json"
        Given the query parameter "q" is "bar"
        Given the query parameter "limit" is 2
        When I request "search/book" using HTTP GET
        Then the response code is 200
        Then the response body contains JSON:
            """
            {
                "data": "@arrayLength(2)"
            }
            """

    Scenario: Test non-existing books
        Given the "Accept" request header is "application/json"
        Given the "Content-Type" request header is "application/json"
        Given the query parameter "q" is "Not even existing on the world"
        When I request "search/book" using HTTP GET
        Then the response code is 200
        Then the response body contains JSON:
            """
            {
                "data": "@arrayLength(0)"
            }
            """

    Scenario: Test if required query parameter is not provided
        Given the "Accept" request header is "application/json"
        Given the "Content-Type" request header is "application/json"
        When I request "search/book" using HTTP GET
        Then the response code is 422
        Then the response body is:
            """
            {"message":"Search text is required","errors":{"q":["Search text is required"]}}
            """

    Scenario: Test if query parameter "limit" is not an integer
        Given the "Accept" request header is "application/json"
        Given the "Content-Type" request header is "application/json"
        Given the query parameter "q" is "Not even existing on the world"
        Given the query parameter "limit" is "Not integer"
        When I request "search/book" using HTTP GET
        Then the response code is 422
        Then the response body is:
            """
            {"message":"The limit field must be an integer.","errors":{"limit":["The limit field must be an integer."]}}
            """
