#
# Table structure for table 'tt_content'
#
CREATE TABLE tt_content (
    tx_flashmessage_bgcolor VARCHAR(7) DEFAULT '' NOT NULL,
    tx_flashmessage_textcolor VARCHAR(7) DEFAULT '' NOT NULL,
    tx_flashmessage_position VARCHAR(10) DEFAULT 'normal' NOT NULL
);

-- Add field to pages table for global flash message toggle
CREATE TABLE pages (
    tx_flashmessage_show tinyint(1) DEFAULT 1 NOT NULL
);
