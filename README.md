# OhmoriLabHP

**早稲田大学 創造理工学部 経営システム工学科 大森研究室のオフィシャルHP**

## メンバー向け

### ログイン
- リンク: [こちら]()

### 更新方法
**ブログの更新**


**ページの更新**




## 開発者向け

### 技術
- WordPress	6.4.3
- PHP 		7.4.1
- MySQL 	8.0.16
- TailwindCSS


### ログイン情報(ローカルにおけるデモとして。リリース後は安全なところに保存)
- User: root
- Pass: root


### ページ構成
**一般公開**
- topページ
  - ヘッダー
  - メインセクション
  - News
  - 研究分野/研究内容
    - 3つくらいに分けて
  - フッター
- 研究内容 /about-research
- 教授紹介 /about-professor
- 担当科目 /teach-class
- 研究業績 /research-works
- 研究室メンバー /members
- リンク集 /links
- 研究室 /
- アルバム
- お問い合わせ /contact

**研究室メンバーページ**
- アルバム
- リンク集

**その他の共有事項**
<カラーコード>
- main: #008458



### 開発時における構築

0. 前提事項
- Localというアプリを使用すると、localhost(自分のPC内)でのWordPressの立ち上げを簡単に行えるので便利です。


1. TailwindCSSのインストール
```
cd wp-content/themes/OhmoriLabTheme/   // パスは各自で合わせてください。
npm init -y
npm i tailwindcss --save-dev
npx tailwindcss init
// tailwind.config.jsの編集
// tailwind.cssの作成
npx tailwindcss -i ./tailwind.css -o ./assets/css/tailwind.css --watch
```

```
==============================
2024.04.01

< 不具合などの連絡先 >
大森研B4 野口翔平
shohein2826@gmail.com
==============================
```



