function cvp(key,vpr,shoparr){
    var n_pre = 'total';
    var num = 'cnum'+key.toString();
    var total = n_pre+key.toString();
    var t_number = document.getElementById(num).value;
    var ttl = t_number*vpr;
    document.getElementById(total).innerHTML = ttl;
    var sm = 0;
    for(var i=0;i<shoparr;i++){
        var aaa = document.getElementById(n_pre+i.toString()).innerText;
        sm += parseInt(aaa);
    }
    document.getElementById('sum').innerHTML = '共计:'+sm+'元';

}