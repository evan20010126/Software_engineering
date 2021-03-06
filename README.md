---
title: 軟體工程期末報告說明
---

# 報告說明

## 最後大致分工

- `組長:`
- 吳秉宸:

1.  前後端與資料庫技術學習 & 串接 & 教學
2.  網頁前端 UI (進入口頁面、即時點餐頁面、顧客檢視訂單頁面、管理菜單頁面、老闆檢視訂單頁面)
3.  後端: 搜尋模組
4.  前後端程式修正 Bug
5.  建立可外連式資料庫
6.  架設遠端電腦伺服器(提供外連網路 port、php server: Apache、node.js server)
7.  node.js 架設 Websocket
8.  組織人手、分工

- `組員:`
- 石貫志:

1.  帳號登入登出系統
2.  UI & JavaScript (登入頁面、自動取 eat 頁面、顧客帳號設定頁面、顧客設定偏好頁面、顧客資訊管理頁面)

- 張正德:

1.  帳號登入登出系統
2.  載入頁面動畫
3.  JavaScript ajax 串接後端動態呈現網頁內容
4.  即時點餐頁面[含 menu 呈現、搜尋、購物車、優惠卷]
5.  顧客檢視訂單頁面[含待確認訂單、進行中訂單、歷史訂單]
6.  管理菜單頁面[含 menu 呈現(+CRUD)、搜尋、設定優惠卷]
7.  老闆檢視訂單頁面[含訂單的呈現(拒絕、接受、完成功能)]

- 黃子毓:

1.  後端程式 Debug
2.  PhP 程式開發
3.  優惠卷模組[含新增刪除]
4.  老闆顯示訂單模組[含 CRUD]
5.  顧客名單模組
6.  訂單狀態模組[含待確認訂單、進行中訂單、歷史訂單]
7.  店家資訊模組

- 吳翊楷:

1.  後端程式 Debug
2.  IP 位置轉 DNS
3.  設計購物車運行流程
4.  後端串接 Google API
5.  購物車顯示模組[含 CRUD]
6.  顧客顯示訂單模組
7.  登入系統模組
8.  顧客帳戶設定模組[含註冊]

- 李明軒: 無

---

## 提供流程品質或系統品質的措施

1. 利用 github desktop 工具，會提醒 pull，有衝突資訊(merge)會顯示且可復原，上傳雲端快速，且可查詢歷史紀錄，更又可以拆解歷史紀錄。
2. 有效利用 trello(以 user_story 的架構)說明前端需要的後台功能細項(input/output)與對系統的影響

---

# 未完成項目

1. 自動取 eat 功能
2. Google API (因授權問題)
3. 顧客評價功能
