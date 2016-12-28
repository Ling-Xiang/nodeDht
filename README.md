"# nodeDht" 
需要建立数据库
nodejs

并建立表 
dht

结构

id   hash   ip

每当搜索到hash 时,会存入数据中的hash列.

注意!
使用nodejs 编写
使用了模块
bencode
easymysql
node-schedule

程序可能因为mysql问题退出
所以需要一个维护脚本,保证不死