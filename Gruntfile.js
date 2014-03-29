module.exports = function(grunt) {
    grunt.initConfig({
        staticPath: 'public/static/dev',
        pkg: grunt.file.readJSON('package.json'),
        sass: {
            dist: {
                files: {
                    '<%=staticPath%>/styles/global.css' : '<%=staticPath%>/scss/global.scss'
                }
            }
        },
        watch: {
            css: {
                files: '<%=staticPath%>/scss/**/*.scss',
                tasks: ['sass']
            }
        }
    });
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.registerTask('default',['sass']);
}
