// 应用模块
const fs = require('fs');
const superagent = require('superagent');
const cheerio = require("cheerio");

// 采集的网站
var url = 'http://cnodejs.org/';
// 发起请求
superagent.get(url)
    .end(function (err_info, rtnData) {
        const jQuery = cheerio.load(rtnData.text);
        let caijiData = [];
        jQuery('.topic_title').each(function (index, ele) {
            var caiji_txt = jQuery(ele).text();
            caijiData.push({caiji_txt});
        });
        // 保存到文件
        fs.writeFile('caiji.json', JSON.stringify(caijiData));
    })