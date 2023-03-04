const entries = {
    scripts: __dirname + "/src/scripts/scripts.js",
    admin: __dirname + "/src/scripts/admin.js",
}

module.exports = {
    dev: {
        mode: "development",
        devtool: 'source-map',
        entry: entries,
        externals: {
            jquery: 'jQuery',
        },
        output: {
            path: __dirname + "/assets/js/",
            filename: '[name].min.js'
        },
        module: {
            rules: [
                {
                    test: /\.js$/, //Files to compile
                    exclude: /node_modules/, //Exclude the node modules directory
                    use: {
                        loader: "babel-loader", //loader name
                        options: {	//To configure
                            presets: ['@babel/preset-env'], //Preset
                        }
                    }
                }
            ]
        }
    },
    prod: {
        mode: "production",
        entry: entries,
        externals: {
            jquery: 'jQuery',
        },
        output: {
            path: __dirname + "/assets/js/",
            filename: '[name].min.js'
        },
        module: {
            rules: [
                {
                    test: /\.js$/, //Files to compile
                    exclude: /node_modules/, //Exclude the node modules directory
                    use: {
                        loader: "babel-loader", //loader name
                        options: {	//To configure
                            presets: ['@babel/preset-env'], //Preset
                        }
                    }
                }
            ]
        }
    }
}