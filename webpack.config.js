const path = require('path')
const webpack = require('webpack')
const autoprefixer = require('autoprefixer')
const FriendlyErrorsPlugin = require('friendly-errors-webpack-plugin')
const CleanWebpackPlugin = require('clean-webpack-plugin')
const BrowserSyncPlugin = require('browser-sync-webpack-plugin')
const AssetsPlugin = require('assets-webpack-plugin')
const OptimizeCSSAssetsPlugin = require('optimize-css-assets-webpack-plugin')
const fs = require('fs')

const appDirectory = fs.realpathSync(process.cwd())

function resolveApp(relativePath) {
  return path.resolve(appDirectory, relativePath)
}

const paths = {
  appSrc: resolveApp('src/app.js'),
  appSass: resolveApp('src/sass/app.sass'),
  appPublic: resolveApp('public')
}

const DEV = process.env.NODE_ENV === 'development'

module.exports = {
  bail: !DEV,
  mode: DEV ? 'development' : 'production',
  target: 'web',
  devtool: DEV ? 'cheap-eval-source-map' : 'source-map',
  entry: [paths.appSrc, paths.appSass],
  node: {
    fs: 'empty'
  },
  module: {
    rules: [
      {
        test: /\.js?$/,
        loader: 'babel-loader',
        include: [path.resolve(__dirname, 'src')]
      },
      {
        test: /\.s[ac]ss$/i,

        use: [
          {
            loader: 'file-loader',
            options: {
              name: DEV ? 'app.css' : 'app.[hash:8].css'
            }
          },
          {
            loader: 'extract-loader'
          },
          {
            loader: 'css-loader?-url'
          },
          {
            loader: 'postcss-loader',
            options: {
              ident: 'postcss',
              plugins: () => [
                autoprefixer({
                  overrideBrowserslist: [
                    '>1%',
                    'last 4 versions',
                    'Firefox ESR',
                    'not ie < 9'
                  ]
                })
              ]
            }
          },
          {
            loader: 'sass-loader'
          }
        ]
      }
    ]
  },
  optimization: {
    minimize: !DEV,
    minimizer: [
      new OptimizeCSSAssetsPlugin({
        cssProcessorOptions: {
          map: {
            inline: false,
            annotation: true
          }
        }
      })
    ]
  },
  resolve: {
    extensions: ['.ts', '.js', 'sass', 'css']
  },
  output: {
    filename: DEV ? 'app.js' : 'app.[hash:8].js',
    path: paths.appPublic
  },
  plugins: [
    new CleanWebpackPlugin(['public']),
    new AssetsPlugin({
      path: paths.appPublic,
      filename: 'public.json'
    }),
    new webpack.EnvironmentPlugin({
      NODE_ENV: 'development',
      DEBUG: false
    }),
    DEV &&
      new FriendlyErrorsPlugin({
        clearConsole: false
      }),
    DEV &&
      new BrowserSyncPlugin({
        notify: false,
        host: 'localhost',
        port: 3030,
        logLevel: 'silent',
        files: ['./**/*.php'],
        proxy: 'http://localhost:8024/'
      })
  ].filter(Boolean)
}
