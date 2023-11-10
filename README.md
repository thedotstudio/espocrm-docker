# ESPOCRM-DOCKER

## Setup
- create Azure VM - leverage azure_vm_template.json.
    - open ports 80/443
    - ubuntu20.4, x64, use 4gb ram, at least
    - attach a disk, allow backup 
    - a pem file will be downloaded for ssh. move it to a good location (~/.ssh recommended). I moved it(id_rsa) to `~/.ssh/espo1`. run `openssl rsa -in id_rsa -pubout > id_rsa.pub` to generate pub file.
    - create a dns address - basically a url.  
    
- login to the VM - `ssh -i ~/.ssh/espo1/id_rsa azureuser@<publicip>` and create a directory `mkdir -p ~/apps`
- from local machine's <<repo-dir>>, run `scp -r -i "~/.ssh/espo1/id_rsa" . azureuser@<<server-ip>>:/home/azureuser/apps/espocrm-docker`
- run `bash install.sh`
- nginx
    - check by going into <<<public ip address>>> on browser to see nginx being there. 
    - `sudo cp nginx/espo /etc/nginx/sites-available/espo`
    - `sudo ln -s /etc/nginx/sites-available/espo /etc/nginx/sites-enabled/espo` - this create a file which is a soft-link to our espo nginx conf
    - `sudo unlink /etc/nginx/sites-enabled/default` - unlink default nginx conf
    - `sudo service nginx restart`
    - now if you go the url, it will be breaking because nothing is running at 8080
- run `docker compose up -d` and check `curl http://localhost:8080` if it is returning a non-trivial response. 
- go to the url now and you should see the Espo running. login with username - `admin` and password - `password`



## Refrences

[docker setup](https://docs.espocrm.com/administration/docker/installation/)


## TODO
[]use Azure CLI to create resource group and document 
