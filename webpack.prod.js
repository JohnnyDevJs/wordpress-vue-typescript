'use strict'

process.env.NODE_ENV = 'production'

process.on('unhandledRejection', err => {
  throw err
})

const webpack = require('webpack')
const config = require('./webpack.config')

console.log('[0/1] Creating an optimized production build...')
compile(config, (err, stats) => {
  handleWebpackErrors(err, stats)
  console.log('[1/1] Build successful!')
})

function compile(config, cb) {
  let compiler
  try {
    compiler = webpack(config)
  } catch (e) {
    printErrors('Failed to compile.', [e])
    process.exit(1)
  }
  compiler.run((err, stats) => {
    cb(err, stats)
  })
}

function printErrors(summary, errors) {
  console.log(summary)
  console.log()
  errors.forEach(err => {
    console.log(err.message || err)
    console.log()
  })
}

function handleWebpackErrors(err, stats) {
  if (err) {
    printErrors('Failed to compile.', [err])
    process.exit(1)
  }

  if (stats.compilation.errors && stats.compilation.errors.length) {
    printErrors('Failed to compile.', stats.compilation.errors)
    process.exit(1)
  }
  if (
    process.env.CI &&
    stats.compilation.warnings &&
    stats.compilation.warnings.length
  ) {
    printErrors(
      'Failed to compile. When process.env.CI = true, warnings are treated as failures. Most CI servers set this automatically.',
      stats.compilation.warnings
    )
    process.exit(1)
  }
}
