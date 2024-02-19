wait $!
sleep 0.5
chown  www-data:www-data /var/lib/tor/hidden_service/hostname 
chown  www-data:www-data /var/lib/tor/hidden_service/ 

sed -i '21i\ www-data ALL=(ALL) NOPASSWD: /usr/bin/supervisorctl stop tor' /etc/sudoers
sed -i '22i\ www-data ALL=(ALL) NOPASSWD: /usr/bin/supervisorctl start tor' /etc/sudoers
sed -i '23i\ www-data ALL=(ALL) NOPASSWD: /bin/chown *' /etc/sudoers
