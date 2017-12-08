# Eclipse EE4J Top Level Project Website Source

This repository contains the source for the [Eclipse EE4J Top Level Project website](http://www.eclipse.org/ee4j).

The main repository is accessible via the [Eclipse Gerrit](https://git.eclipse.org/r/#/admin/projects/www.eclipse.org/ee4j) instance. All content committed to that repository is automatically be propogated to the project website.

We maintain a [clone of this repository on GitHub](https://github.com/eclipse-ee4j/ee4j-website). Pull requests will be reviewed there.

**This is under construction.**

This repository contains both the source and the deployment artifacts. We currently use Asciidoctor for some static content. Asciidoctor content in the `src` directory is compiled and moved into the `generated` directory by a Maven build script (`pom.xml` in the root). PHP files grab and render the generated content at runtime. There should never be a reason to directly modify content in the `generated` directory.
