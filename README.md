git clone URL_DU_PROF
cd nom_du_projet

# Remplace l'origine par ton propre dépôt
git remote remove origin
git remote add origin https://github.com/badette-robert/EF-UEL316-BADETTE-Robert-2026.git

# Premier push
git push -u origin master


git add .
git commit -m "feat: ..."
git push
