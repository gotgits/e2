
# Project 3
+ By: Rose Mikan
+ URL: <http://e2p3.metrognome.me>

## Graduate requirement
+ [x] I have integrated testing into my application
+ [ ] I am taking this course for undergraduate credit and have opted out of integrating testing into my application


## Notes for instructor
seedsRounds() is less than perfect, but functioning.

## Codeception testing output
```
Codeception PHP Testing Framework v4.1.23
Powered by PHPUnit 9.5.10 by Sebastian Bergmann and contributors.

Acceptance Tests (5) -----------------------------------------------------------------------------------------------------------------------------------------------------------------
HistoryPageCest: Page loads
Signature: HistoryPageCest:pageLoads
Test: tests/acceptance/HistoryPageCest.php:pageLoads
Scenario --
 I am on page "/history"
 I see in title "Game History"
 I see element "#logo"
 I see link "Return to Game"
 PASSED 

HomePageCest: Page loads
Signature: HomePageCest:pageLoads
Test: tests/acceptance/HomePageCest.php:pageLoads
Scenario --
 I am on page "/"
 I see in title "Game of Gnomes"
 I see element "#logo"
 PASSED 

HomePageCest: Test validation is working
Signature: HomePageCest:testValidationIsWorking
Test: tests/acceptance/HomePageCest.php:testValidationIsWorking
Scenario --
 I am on page "/"
 I click "[test=submit-button]"
 I click "[test=submit-play-button]"
 I am on page "/"
 I fill field "[test=name-input]","est laboriosam eos"
 PASSED 

RegisterPageCest: Page loads
Signature: RegisterPageCest:pageLoads
Test: tests/acceptance/RegisterPageCest.php:pageLoads
Scenario --
 I am on page "/register"
 I see "Player Registration Log"
 I see element "#logo"
 I grab multiple "#name"
 I grab multiple "#playerid"
 I grab multiple "#choice"
 I see link "Return to Game"
 PASSED 

RoundPageCest: Page loads
Signature: RoundPageCest:pageLoads
Test: tests/acceptance/RoundPageCest.php:pageLoads
Scenario --
 I am on page "/round"
 I see in title "Round Details"
 I see element "#logo"
 I see "Player turn:"
 I see "Opponent turn:"
 I see "Winner:"
 I see link "Return to History"
 PASSED 

--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


Time: 00:00.141, Memory: 14.00 MB

OK (5 tests, 14 assertions)
```