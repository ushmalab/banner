Site Package for the project "Banner Flash Message"
==============================================================

# Flash Message Content Element

### TypoScript Constants
```typoscript
theme.tx_flashmessage.storagePid = (set in backend)
```
### Create Flash Messages
1. Add content element "Flash Message" 
2. Configure content, colors, and position (top/bottom)
3. For global messages: create on storage page

### Content Element Fields
- **Message Content**: Rich text with RTE support
- **Background Color**: Custom color picker (default: #007bff)
- **Text Color**: Custom color picker (default: #ffffff) 
- **Position**: Top (sticky banner) or Bottom (sticky footer)

## File Structure
```
EXT:banner_flash_message/
├── Configuration/ContentElements/Flash.setupts
├── Configuration/TCA/Overrides/tt_content.php
├── Configuration/TypoScript/
├── Resources/Private/Templates/ContentElements/Flash.html
├── Resources/Private/Language/ContentElements.xlf
└── Resources/Public/Css/styles.css
```

## Global Configuration
```
By default, global flash messages are enabled on all pages. To hide flash messages on specific pages:

Edit the page properties
Go to the "General" tab
Find "Show Global Flash Messages" toggle (located after subtitle field)
Untoggle to disable flash messages on that page
```

## Database Fields
- `tx_flashmessage_bgcolor` - Background color
- `tx_flashmessage_textcolor` - Text color  
- `tx_flashmessage_position` - Display position
- `tx_flashmessage_show` - Toggle to show/hide global flash messages (default: ON)

