build:
	cd docker/ && docker compose build --no-cache --force-rm && \
	cd ../gulp/ && volta install node@14.19.3 yarn@1.22.18 && \
	yarn install
up:
	cd docker/ && docker compose --env-file ../.env up -d && \
	cd ../gulp/ && npx gulp
stop:
	cd docker/ && docker compose stop
down:
	cd docker/ && docker compose --env-file ../.env down --volumes && cd ../
restart:
	@make down
	@make up