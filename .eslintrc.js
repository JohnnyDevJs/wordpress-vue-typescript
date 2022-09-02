module.exports = {
  env: {
    browser: true,
    es2021: true
  },
  plugins: ['prettier'],
  extends: ['standard', 'prettier/standard'],
  parserOptions: {
    ecmaVersion: 'latest',
    sourceType: 'module'
  },
  rules: {}
}
