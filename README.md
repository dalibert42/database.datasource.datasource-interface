Datasources for Mouf
====================

You can find in this package two very useful interfaces:

- `DataSourceInterface`: a DataSource that represents an array of arrays
- `RowInterface`: a Row that is the representation of a key indexed array.

Known implementations
---------------------

- MagicQuery (TODO)

This packages contains 2 very basic implementations of these interfaces:

- The `Row` class maps a key indexed array into a `RowInterface`
- The `DataSource` class maps an array of array into a `DataSourceInterface`

Modifiers
---------

This package comes with a set of utility classes to transform rows and datasources:

- `RowMapper` creates an "output" row from an "input" row and a set of `Pickers` (implementing the `PickerInterface`)
- `ArrayMapper` creates an "output" datasource from an "input" datasource and a set of `Pickers` (implementing the `PickerInterface`)

This package comes with 2 pickers (implementing the `PickerInterface`):

- `RowPicker`: selects one value in a row
- `CallbackPicker`: applies a callback function to a row and returns the value of the callback

Finally, the `RowBuilder` class can be used to merge rows and to add datasources as keys of a row.
