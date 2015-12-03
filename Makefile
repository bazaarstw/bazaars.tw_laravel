sync_old_repo:
	git subtree pull --prefix=tmp_bazaars bazaars laravel_link --squash
	# rsync -av tmp_bazaars/* public/
	scp -r tmp_bazaars/* public/

docker_mysql_ip:
	@docker inspect `docker ps | grep mysql | awk '{print $$1}'` | grep IPAddress
