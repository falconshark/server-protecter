#Server Protecter測試環境（Sandbox）

由Vargant及Chef-Solo建構而成的測試環境。

為了盡可能貼近作者實際運行Server Protecter時的伺服器環境，本環境使用的Vargant Box為Ubuntu 12.04 64位元。

視乎將來的狀況可能會有所改變。

##安裝

**注意！在執行本測試環境前，請先安裝最新版本的Vargant。**

**詳細教學請見：**

**[Vagrant 安裝與建構] (http://drupaltaiwan.org/forum/20141125/11378)**

1.下載Ubuntu 12.04 64位元的Vagrant box檔案：

https://cloud-images.ubuntu.com/vagrant/precise/current/precise-server-cloudimg-amd64-vagrant-disk1.box

2.下載完成後，匯入該Vagrant box檔案：

```bash
$ vagrant box add base precise-server-cloudimg-amd64-vagrant-disk1.box
```

##用法
在sandbox/dev目錄下，輸入以下指令啟動虛擬機：

```bash
$ vagrant up
```

關閉虛擬機則是：

```bash
$ vagrant halt
```

進入虛擬機：

```bash
$ vagrant ssh
```