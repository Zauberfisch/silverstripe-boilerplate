# compass / scss config file
# see http://compass-style.org/help/tutorials/configuration-reference/ for documentation

# possible values: :development, :production
environment = :development

# source commends in the compiled css that indicate the scss line number, set to true to enable
line_comments = false

# possible values: :nested, :expanded, :compact, :compressed
output_style = (environment == :production) ? :compressed : :expanded

# define base path for compass and relevant folders
http_path = "/"
css_dir = "css"
sass_dir = "scss"
images_dir = "images"
javascripts_dir = "javascript"
fonts_dir = "fonts"

# make asset urls relative
relative_assets = true
