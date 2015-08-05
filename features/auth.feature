Feature: User is signed in

    Scenario: User sign in
        Given a user whose name is "jaceju"
        When user attempts to sign in
        Then user should be sign in