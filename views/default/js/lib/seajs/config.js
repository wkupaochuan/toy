seajs.config({
    debug: true,
    alias: {
        jquery: 'lib/jquery/1.8.3/jquery.js',
    },
    charset: 'utf-8'
});

/**
 * 已经加载的模块直接执行，这里是同步阻塞的执行
 * @param id
 * @returns {*}
 */
seajs.execImmediateInCache = function(id) {
    var mod = seajs.cache[seajs.resolve(id)];
    if (mod) {
        return mod.exec();
    }
    return null;
};
