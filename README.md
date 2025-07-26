# Site Package for the project "Banner Flash Message"

## Flash Message Content Element

### Content Element Creation Methods

#### 1A. Content Block Implementation
Flash messages can be created using the new Content Blocks system:
* **Location**: `EXT:banner_flash_message/ContentBlocks`
* **Content Block Name**: `banner/flash`
* Modern TYPO3 approach with YAML configuration
* Simplified field management and template structure
* Page-specific content element placement

**Create using**: `ddev typo3 make:content-block`  
Run this command and add the vendor and content element name.

```
└── ContentBlocks/
    └── banner-flash/
        ├── EditorInterface.yaml
        ├── Template.html
        └── backend-preview.html
```

#### 1B. Content Element Using Normal Method
Traditional TYPO3 content element implementation with file structure:

```
EXT:banner_flash_message/
├── Configuration/
│   ├── ContentElements/Flash.typoscript
│   ├── TCA/Overrides/tt_content.php
│   └── TypoScript/
│       └── setup.typoscript
└── Resources/
    └── Private/
        ├── Templates/ContentElements/Flash.html
        └── Language/ContentElements.xlf
```

## Global Messages via TypoScript

### Method 1: Layout-based Global Messages
1. **Set up StartPage Backend Layout** on root page:
   * Go to root page → Page Properties → Appearance tab
   * Select "StartPage" as Backend Layout

2. **Add banner content elements**:
   * In **Banner section (colPos = 11)**: Add "Flash Message" with position = "top"
   * In **Footer section (colPos = 12)**: Add "Flash Message" with position = "bottom"
   * In **Normal section (colPos = 14)**: Regular page content

3. Configure flash message content, colors, and position settings

4. **Backend Layout Structure**:
   ```
   StartPage Backend Layout:
   ┌─────────────────────┐
   │ Banner (colPos=11)  │ ← Top flash messages here
   ├─────────────────────┤
   │ Normal (colPos=14)  │ ← Regular content
   ├─────────────────────┤
   │ Footer (colPos=12)  │ ← Bottom flash messages here
   └─────────────────────┘
   ```

5. Messages appear on all pages automatically via TypoScript slide inheritance
6. **To exclude banners on specific pages**: Use different page layouts without banner sections

**File Structure:**
```
EXT:banner_flash_message/
├── Configuration/
│   ├── TsConfig/Page/BackendLayouts/
│   └── TypoScript/Page/page.typoscript
└── Resources/Template/Page/
```

### Method 2: Storage Folder Global Messages
1. Create a storage folder (e.g., "Global Messages")
2. Add "Flash Message" content elements in this folder
3. Set the storage PID in TypoScript constants:
   ```
   theme.tx_flashmessage.storagePid = 123  # Replace with actual PID
   ```
4. The TypoScript automatically loads all flash messages from storage folder:
   * Checks `tx_flashmessage_show` field on each page
   * Filters by position (top/bottom) and visibility
   * Supports multi-language content
   * Orders by sorting field

**File Structure:**
```
EXT:banner_flash_message/
├── Configuration/
│   ├── TCA/Overrides/pages.php
│   └── TypoScript/
│       ├── setup.typoscript
│       └── constants.typoscript
```

5. **Page-level control**: Edit page properties to toggle "Show Global Flash Messages"

## Content Element Fields
* **Header**: Page title/heading (optional)
* **Subheader**: Secondary heading (optional)
* **Message Content**: Rich text with RTE support
* **Background Color**: Custom color picker (default: `#007bff`)
* **Text Color**: Custom color picker (default: `#ffffff`)
* **Position**: Top (sticky banner) or Bottom (sticky footer)