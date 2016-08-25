/*a0412fee34eafb863049c43020c0364d*/
(function () {
    var cache = {};
    this.jstpl_format = function jstpl_format(format, data) {
        var res = format,
            m = format.match(/%([^%]+)%/g),
            n = m.length;
        for (var i = 0; i < n; i++) {
            var word = m[i].substring(1, m[i].length - 1);
            res = res.replace(new RegExp(m[i]), data[word])
        };
        return res
    };
    this.jstpl = function jstpl(str, data) {
        var fn = !/\W/.test(str) ? cache[str] = cache[str] || jstpl(document.getElementById(str).innerHTML) : new Function("obj", "var p=[],print=function(){p.push.apply(p,arguments);};with(obj){p.push('" + str.replace(/[\r\t\n]/g, " ").split("<%").join("\t").replace(/((^|%>)[^\t]*)'/g, "$1\r").replace(/\t==(.*?)%>/g, "',jstpl_format($1,obj),'").replace(/\t=(.*?)%>/g, "',$1,'").split("\t").join("');").split("%>").join("p.push('").split("\r").join("\\'") + "');}return p.join('');");
        return data ? fn(data) : fn
    }
})()