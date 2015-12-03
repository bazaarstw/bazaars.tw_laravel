sync_old_repo:
	git subtree pull --prefix=tmp_bazaars bazaars develop --squash
	rsync -av tmp_bazaars/* public/
