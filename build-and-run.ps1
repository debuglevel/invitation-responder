Write-Output "== docker-compose down"
docker-compose down

Write-Output "== docker-compose up --build"
docker-compose up --build

Write-Output "== pause"
pause
