# See https://tech.davis-hansson.com/p/make/
MAKEFLAGS += --warn-undefined-variables
MAKEFLAGS += --no-builtin-rules

.DEFAULT_GOAL := help
.PHONY: help
help:
	@printf "\033[33mUsage:\033[0m\n  make TARGET\n\033[33m\nAvailable Commands:\n\033[0m"
	@grep -E '^[a-zA-Z-]+:.*?## .*$$' Makefile | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "  [32m%-32s[0m %s\n", $$1, $$2}'

KNOWN_TARGETS = infection
ARGS := $(filter-out $(KNOWN_TARGETS),$(MAKECMDGOALS))
.DEFAULT: ;: do nothing

#
# Variables
#---------------------------------------------------------------------------

PHP_CS_FIXER=vendor/bin/php-cs-fixer fix
PHP_CS_FIXER_ARGS=--verbose --config=.php-cs-fixer.dist.php --allow-risky=yes --diff

# Psalm
PSALM=vendor/bin/psalm

DISABLE_XDEBUG=XDEBUG_MODE=off

#
# Commands (phony targets)
#---------------------------------------------------------------------------

analyze: ## Runs analyze tools (Static Analysis tools, Unit and Functional tests and etc)
analyze: cs-check validate-composer tests

cs-check: prerequisites ## Runs code style checks in dry-run mode
	$(DISABLE_XDEBUG) $(PHP_CS_FIXER) $(PHP_CS_FIXER_ARGS) --dry-run

cs-fix: prerequisites ## Runs code style checks and fix founded issues
	$(DISABLE_XDEBUG) $(PHP_CS_FIXER) $(PHP_CS_FIXER_ARGS)

validate-composer: prerequisites ## Runs Composer Validate
	$(DISABLE_XDEBUG) composer validate --strict --check-lock

tests: prerequisites ## Runs tests
	$(DISABLE_XDEBUG) vendor/bin/phpunit

# We need both vendor/autoload.php and composer.lock being up to date
.PHONY: prerequisites
prerequisites: vendor/autoload.php composer.lock
