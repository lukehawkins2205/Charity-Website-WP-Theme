

const path = require( 'path');
const MiniCssExtractPlugin = require( 'mini-css-extract-plugin' );
const { CleanWebpackPlugin } = require( 'clean-webpack-plugin' );
const OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const cssnano = require('cssnano');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');
const webpack = require("webpack");

const JS_DIR = path.resolve(__dirname, 'src/js');
const IMG_DIR = path.resolve(__dirname, 'src/img');
const FONT_DIR = path.resolve(__dirname, 'src/library/fonts');
const BUILD_DIR = path.resolve(__dirname, 'build');



const entry = {
    main: JS_DIR + '/main.js'
};
const output = {
    path: BUILD_DIR,
    filename: 'js/[name].js'
};


const rules = [
    {
        test: /\.js$/,
        include: [ JS_DIR ],
        exclude: /node_modules/,
        use: 'babel-loader'
    },
    {
        test: /\.css$/,
        use: [
            MiniCssExtractPlugin.loader,
            'css-loader'
        ]
    },
    {
        test: /\.scss$/,
        exclude: /node_modules/,
        use: [
            MiniCssExtractPlugin.loader,
            'css-loader',
            'sass-loader',
        ]
    },
    {
        test: /\.(png|jpg|svg|jpeg|gif|ico)$/,
        exclude: [ FONT_DIR, /node_modules/ ],
        use: {
            loader: 'file-loader',
            options: {
                name: '[path][name].[ext]',
                publicPath: 'production' === process.env.NODE_ENV ? '../' : '../../',
                useRelativePaths: true
            }
        }
    },
    {
        test: /\.(ttf|otf|eot|svg|woff(2)?)(\?[a-z0-9]+)?$/,
        exclude: [ IMG_DIR, /node_modules/ ],
        use: {
            loader: 'file-loader',
            options: {
                name: '[path][name].[ext]',
                publicPath: 'production' === process.env.NODE_ENV ? '../' : '../../'
            }
        }
    }
];


const plugins = ( argv ) => [
    new CleanWebpackPlugin( {
        cleanStaleWebpackAssets: ( argv.mode === 'production' )
    } ),
    new MiniCssExtractPlugin( {
        filename: 'css/[name].css'
    } ),
    new webpack.ProvidePlugin({
        $: 'jquery',
        jQuery: 'jquery'
    })
];


module.exports = ( env, argv ) => ({
    entry: entry,
    output: output,
    devtool: 'source-map',
    module: {
        rules: rules,
    },
    optimization:{
        minimizer: [
            new OptimizeCssAssetsPlugin({
                cssProcessor: cssnano,
            }),
            new UglifyJsPlugin({
                cache: false,
                parallel: true,
                sourceMap: false,
            })
        ]
    },
    plugins: plugins(argv),
});