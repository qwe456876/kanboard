# Qwen Tasks (Beta)

This plugin creates Kanboard tasks from JSON copied from the Qwen web chat.
It does not use an API key, does not automate a Qwen login, and does not send
Kanboard data to Qwen.

## Installation

Copy this directory to `plugins/QwenTasks`. The folder name is case-sensitive.
Enable the plugin from **Settings → Plugins**.

## JSON format

```json
{
  "tasks": [
    {
      "title": "Prepare release",
      "description": "Run the release checklist",
      "tags": ["release", "beta"],
      "column_id": 3
    }
  ]
}
```

The plugin shows an explicit form submit, checks the current user's project and
column permissions, limits each import to 50 tasks, and uses Kanboard's normal
task creation model so events and installed plugins continue to work.
