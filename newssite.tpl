server {
        listen       80;
        <server_name>
        #charset koi8-r;
            if ($http_user_agent ~ "Googlebot") {
                return 404;
            }
            if ( $host !~ 'www' ) {
                rewrite ^/(.*) http://www.$host/$1 permanent;
            }
        access_log  "/data/log/nginx/<host_name>.access.log";
        root   "/data/newssite/sites/$server_name";
        index index.php;
        add_header "Referrer-Policy" "no-referrer";
        location / {
          if (!-e $request_filename) {
              rewrite ^/content/(\w+)\.html /detail.php?id=$1 last;
              rewrite ^/category/(\w+)$ /list.php?category=$1&page=1 last;
              rewrite ^/category/(\w+)-(\d+)\.html /list.php?category=$1&page=$2 last;
              rewrite ^/tags/(.+) /tag.php?tag=$1 last;
             rewrite ^/(.*)$ /index.php?$1 last;
              break;
            }
          }
        
        error_page  404              /404.html;

         #redirect server error pages to the static page /50x.html
        
        error_page   500 502 503 504  /50x.html;
        location = /50x.html {
            root   html;
        }

         #proxy the PHP scripts to Apache listening on 127.0.0.1:80
        
        #location ~ \.php$ {
           # proxy_pass   http://127.0.0.1;
        #}

         #pass the PHP scripts to FastCGI server listening on 127.0.0.1:9000
        
        location ~ \.php(.*)$  {
            fastcgi_pass   127.0.0.1:9000;
            fastcgi_index  index.php;
            fastcgi_split_path_info  ^((?U).+\.php)(/?.+)$;
            fastcgi_param  SCRIPT_FILENAME  $document_root$fastcgi_script_name;
            fastcgi_param  PATH_INFO  $fastcgi_path_info;
            fastcgi_param  PATH_TRANSLATED  $document_root$fastcgi_path_info;
            include        fastcgi_params;
        }

         #deny access to .htaccess files, if Apache's document root
         #concurs with nginx's one
        
       # location ~ /\.ht {
         #   deny  all;
        #}
    }
