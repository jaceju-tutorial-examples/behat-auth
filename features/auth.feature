Feature: User is signed in

    Scenario: User sign in
        Given a user whose name is "jaceju"
        When user attempts to sign in
        Then user should be sign in

    Scenario: User sign out
        Given a user whose name is "jaceju"
        And user is signed in
        When user attempts to sign out
        Then user should be sign out
