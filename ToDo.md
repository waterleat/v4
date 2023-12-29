# add more fields to other models
- succession
- varieties
- families
    - create
    - edit
    - show

## change value="{{  }}"
    - show
    - edit - change value





### other
- migration
- model
- seeder
- factory
- request

- - -
- - -
- - -
# Planning Model Actions
- read the succession data for that id
## add succession to Plans
- status is created = "Planned"
- ss to he are converted from doy to dates
- ss to he need to check for EOY
- auto increment date to make future plan if today is >7days past plant end



## sow seeds
- status is changed to "Sown"
- sown field is datepicker
- ps = sown date add (daysInNursery - 7)
- pe = sown date add (daysInNursery + 7)
- hs = sown date add (daysToMaturity - 7)
- he = sown date add (daysToMaturity + daysOfHarvest + 7)
- number sown
## germinated
- datepicker, 
- calc days to germinate
## plant seedlings
- status is changed to "Planted"
- planted field is datepicker
- calc days in nursery
- location is required
- hs and he remain same
## first harvest
- status is changed to "Harvesting"
- croppingFrom field is datepicker
- calc days to mature
- he may change
## crop finished
- croppingFinished field is datepicker
- calc days of harvest
## crop failed



# Index page for plans
- action buttons on all cards to be hidden with button to enable them
- filter on status
- filter on growing locn
- exclude plans if crop finished
  - WORKING by using all, sorted, past finished sets of Plans, which are hardcoded
  - however, this needs to be selected by tabs/buttons
- delete works but needs a confirmation action

