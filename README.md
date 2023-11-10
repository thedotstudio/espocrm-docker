# ESPOCRM-DOCKER

## Setup
- create Azure VM - leverage azure_vm_template.json.
    - open ports 80/443
    - ubuntu20.4, x64, use 4gb ram, at least
    - attach a disk, allow backup 
    - a pem file will be downloaded for ssh. move it to a good location (~/.ssh recommended). I moved it(id_rsa) to `~/.ssh/espo1`. run `openssl rsa -in id_rsa -pubout > id_rsa.pub` to generate pub file. 
    
- login to the VM - `ssh -i ~/.ssh/espo1/id_rsa azureuser@<publicip>`
- 
- run `install.sh`
- nginx
    - check by going into <<<public ip address>>> on browser to see nginx being there. 
    - 
    - `sudo unlink /etc/nginx/sites-enabled/default` - unlink default nginx conf
    - ``



## Refrences

[docker setup](https://docs.espocrm.com/administration/docker/installation/)


## TODO
[]use Azure CLI to create resource group and document 
