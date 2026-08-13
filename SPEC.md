# Team Score — Website Spec

## 1. Overview

**App name:** Team Score
**What it does:** A configurable golf scoring app for foursomes. Before teeing off, a group sets up their game format; the app then tracks live team and individual scores for that predetermined game throughout the round.

**Supported game formats:**
- Net scoring
- Gross scoring
- Stableford
- Points Quota
- Nines
- Baseball (Net and Gross variants)
- Six Six Six
- ABCD Game

**Platform status:** Developed, Android only. Not yet published to Google Play Store.

**Purpose of this website:** Purely informational. Showcase what Team Score does and the game formats it supports. No purchase, checkout, or account system — this is a marketing/showcase site only, not a store (despite the working title).

**Target audience:** Casual weekend foursomes — everyday golfers organizing their own games with friends, not clubs or leagues.

**Tone/style:** Classic golf / country club feel — traditional, upscale aesthetic. Greens, wood tones, serif accents. Should feel trustworthy and established, not flashy or startup-y.

## 2. Site Structure

- **Home** — hero section + feature overview (introduces the app, its purpose, and the game formats at a glance)
- **Screenshots / Gallery** — visual walkthrough of the app UI in action
- **FAQ** — common questions about setup, formats, and how scoring works
- **About / Contact** — background on the app/creator and a way to get in touch

## 3. App Availability / CTA

- App is **not** currently downloadable from this site.
- Since it's not yet on the Play Store, show a **"Coming to Google Play"** teaser in place of a download button (e.g. a badge/placeholder graphic with a "notify me" or "check back soon" note — no functioning download link yet).
- No iOS mention needed unless that changes later.

## 4. Branding Spec

- **Name/logo:** "Team Score" wordmark paired with the existing flag icon (`Photos/LoGo.jpg`) as a placeholder mark until/unless a refined version is made.
- **Color palette:**
  - Fairway Green `#1B4332` — primary (headers, nav, key text)
  - Deep Pine `#0D2818` — dark accents, footer background
  - Cream `#F5F0E6` — page background
  - Wood Tan `#C9A876` — secondary accents, dividers, card backgrounds
  - Muted Gold `#B8860B` — CTA buttons, links, highlights
  - Off-white `#FFFFFF` — content card backgrounds
- **Typography:**
  - Headings: "Playfair Display" (serif) — traditional, upscale
  - Body/UI text: "Source Sans 3" (sans-serif) — clean, readable
- **Imagery:** Real app screenshots (§5) as the primary visual content; course/foursome photography as supplementary hero/background imagery if available later.

## 5. Assets On Hand

**Logo:** `Photos/LoGo.jpg` — simple flag-on-green icon graphic. Usable as a placeholder mark; may want a refined/vector version later.

**Screenshots** (in `Photos/`), showing the real in-app flow:
- `SelectGolfCourse.jpg` — course list (select/edit/delete/add a saved course)
- `ConfigureGolfCourse.jpg` — per-hole setup: par and handicap index for each hole
- `GolfCourseConfigDetails.jpg` — handicap-index picker detail for a hole
- `PlayerSetup.jpg` — add players to a course/round with name + handicap, start new game
- `TeamScoreCard.jpg` — live scorecard grid: par/hole/hdcp rows, per-player gross scores with net strokes highlighted, running team total and strokes-used row, toggle for Gross/Net display mode
- `EnterPlayersScores.jpg` — score entry screen: numeric keypad, per-player score entry, and Net/Gross/Junk tagging per player per hole
- `TeamSummary.jpg` — full round summary: computes Points Quota, Score O/U, Stableford, "Six Six Six," and ABCD Game side by side for the same round; per-player front/back/total plus eagles/birdies/pars breakdown
- `Screenshot_20260813_122855_TeamScore_Rev4.jpg` — additional in-app capture (review before use; app is currently at Rev 2.10 per the Team Summary screen, note discrepancy if relevant)

Together these cover the full flow: pick/configure a course → set up players and handicaps → enter scores hole-by-hole → view live team scorecard → view end-of-round summary across formats.

## 6. Contact

- **Contact:** Vince Gamble — vgamble@golfpvcc.com
- Use on About/Contact page as the way for visitors to reach out.

## 7. FAQ — Confirmed Questions

The FAQ page should answer, at minimum:
1. **How are players scored?**
2. **How do you set up a golf course?**
3. **How do you set up a player?**
4. **Switching screens** (how navigation works within the app)
5. **What do the score outputs look like?** (what the summary/output screens show)

*(Answers to be written using the screenshots above as reference — e.g. course setup answer can walk through `SelectGolfCourse.jpg` → `ConfigureGolfCourse.jpg`; player setup answer can reference `PlayerSetup.jpg`; scoring answer can reference `EnterPlayersScores.jpg` and `TeamScoreCard.jpg`; outputs answer can reference `TeamSummary.jpg`.)*

## 8. Content Needed (still to gather)

- Short description/copy per game format (Net, Gross, Stableford, Points Quota, Nines, Baseball Net/Gross, Six Six Six, ABCD Game)
- Written FAQ answers (draft from screenshots, confirm wording with Vince)

## 9. Tech Approach

- Simple static site (HTML/CSS/JS), no backend needed given informational-only scope.
- Easy to host (e.g. static hosting) and easy to extend later if a Play Store link or download CTA is added.

## 10. Open Items / To Confirm Later

- Written FAQ answer copy (draft exists as a task; needs Vince's confirmation)
- Whether/when to add a Play Store link once published
